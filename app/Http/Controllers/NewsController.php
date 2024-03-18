<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\News;

class NewsController extends Controller
{
    public function news(Request $request): View | JsonResponse
    {
        $perPage = 5;

        $news = (new News())->fetchNews($perPage);

        $nextPageUrl = $news->nextPageUrl();

        if ($request->ajax()) {
            $htmlContent = view('frontend.news.news._news', [
                'news' => $news,
                'nextPageUrl' => $nextPageUrl,
                'nextPageNum' => $news->currentPage() + 1
            ])->render();
            return response()->json(['html' => $htmlContent]);
        }

        return view('frontend.news.news', [
            'news' => $news,
            'nextPageUrl' => $nextPageUrl,
            'nextPageNum' => $news->currentPage() + 1
        ]);
    }

    public function show($slug): View
    {
        return view('frontend.news.show', [
            'news' => News::where('slug', $slug)->first(),
        ]);
    }
}
