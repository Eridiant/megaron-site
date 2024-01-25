<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\News;

class NewsController extends Controller
{
    public function news(Request $request): View
    {

        $perPage = 5;

        $news = News::with('trtitle')
            ->with('trexcerpt')
            ->where('status', '>', 0)
            ->has('trtitle')
            // ->whereNotNull('news.trtitle')
            ->paginate($perPage);

        $nextPageUrl = $news->nextPageUrl();

        return view('frontend.news.news', [
            'news' => $news,
            'nextPageUrl' => $nextPageUrl,
            'nextPageNum' => $news->currentPage() + 1
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        if (!$request->ajax()) return response()->json(['error' => 'еггог'], 201);

        $perPage = 5;

        $news = News::with('trtitle')
            ->with('trexcerpt')
            ->where('status', '>', 0)
            ->has('trtitle')
            ->paginate($perPage);

        $nextPageUrl = $news->nextPageUrl();

        $htmlContent = view('frontend.news.news._news', [
            'news' => $news,
            'nextPageUrl' => $nextPageUrl,
            'nextPageNum' => $news->currentPage() + 1
        ])->render();
        // dd(response()->json(['html' => $htmlContent], 201));
        return response()->json(['html' => $htmlContent]);
        // return response()->json(['success' => 1, 'render' => $htmlContent], 201);
    }

    public function show($slug): View
    {
        return view('frontend.news.show', [
            'news' => News::where('slug', $slug)->first(),
        ]);
    }
}
