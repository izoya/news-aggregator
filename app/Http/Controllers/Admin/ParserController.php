<?php

namespace App\Http\Controllers\Admin;

use App\Events\ParseNewsEvent;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\News;
use App\Models\Resource;
use App\Services\ParsingService;
use Laravie\Parser\InvalidContentException;
use Log;
use XmlParser;

class ParserController extends Controller
{

    public $resources;

    public function __construct()
    {
        $this->resources = Resource::all();
    }

    public function index()
    {
        foreach ($this->resources as $resource) {
            NewsParsingJob::dispatch(new ParsingService($resource));
        }

        return view('admin.news.index', [
            'news'=> News::orderBy('updated_at', 'desc')->paginate(15),
        ]);
    }




}
