<?php

namespace App\Http\Controllers;

use App\NewsTag;
use Illuminate\Http\Request;
use App\News;
use App\Product;
use Session;
use App\Category;
use App\Tag;

class NewsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request, $id = null)
    {
//        $listProduct = Product::where('is_deleted', false)->get();
        $keyword = null;
        $listTag = null;
        $news = News::where('is_deleted', false);
        $listNew = $news->orderBy('created_at', 'desc')->paginate(10);
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $news = $news->where('title', 'like', '%' . $keyword . '%');
        }
        $news = $news->orderBy('created_at', 'desc')->paginate(5);
        if (isset($id)) {
            $news = News::where('is_deleted', false)->where('category_id', $id)->paginate(10);
        }

        $arrNewsIds = [];
        foreach ($news as $item) {
            $arrNewsIds[] = $item->id;
        }

        $tagNews = null;

        $tagIds = [];
        if (count($arrNewsIds) > 0) {
            $tagNews = NewsTag::whereIn('news_id', $arrNewsIds)->get();
            foreach ($tagNews as $item) {
                $tagIds[] = $item->tag_id;
            }
        }

        $tags = Tag::where('is_deleted', false)->whereIn('id', $tagIds)->get();
        $tagItems = [];
        foreach ($tags as $item) {
            if (!in_array($item, $tagItems)) {
                $tagItems[] = $item;
            }
        }
        $listNewsCategory = Category::where('is_deleted', false)->where('type', 2)->get();
        $productNews = Product::where('is_deleted', false)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('client.news.news',
            [
                'news' => $news,
                'listNew' => $listNew,
                'listNewsCategory' => $listNewsCategory,
                'productNews' => $productNews,
                'keyword' => $keyword,
                'tagItems' => $tagItems
            ]);
    }

    public function detailNews(Request $request, $id)
    {
        $list = News::where('is_deleted', false);
        $listTag = null;

        $listNew = $list->orderBy('created_at', 'desc')->paginate(10);
        $news = $list->find($id);
        $tagNews = null;
        $tagIds = [];
        $tagNews = NewsTag::where('news_id', $news->id)->get();

        foreach ($tagNews as $item) {
            $tagIds[] = $item->tag_id;
        }

        $tags = Tag::where('is_deleted', false)->whereIn('id', $tagIds)->get();
        $tagItems = [];
        foreach ($tags as $item) {
            if (!in_array($item, $tagItems)) {
                $tagItems[] = $item;
            }
        }
        $listNewsCategory = Category::where('is_deleted', false)->where('type', 2)->get();
        $productNews = Product::where('is_deleted', false)->orderBy('created_at', 'desc')->limit(4)->get();
        $newsRandom = News::where('is_deleted', false)->inRandomOrder()->limit(2)->get();

        return view('client.news.detailNews',
            [
                'news' => $news,
                'listNew' => $listNew,
                'listNewsCategory' => $listNewsCategory,
                'productNews' => $productNews,
                'tagItems' => $tagItems,
                'newsRandom' => $newsRandom
            ]);
    }

    public function newsTag($id)
    {
        $tag = Tag::where('is_deleted', false)->where('id', $id)->first();

        return view('client.pages.tag', ['newsTag' => $tag]);

    }
}
