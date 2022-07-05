<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Controllers\ArticlesController;

class ArticleApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return $this->sendResponse(ArticleResource::collection($articles), 'Articles retrieved successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return $this->sendError('Article not found.');
        }
   
        return $this->sendResponse(new ArticleResource($article), 'Article retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $csv = new  ArticlesController();
        $csv->import(); 
   
        return response()->json([
            'status' => true,
            'message' => "articles imported successfully!"
        ], 200);
    }
}
