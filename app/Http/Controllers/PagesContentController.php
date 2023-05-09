<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Statamic\Facades\Collection;
use Statamic\Entries\Entry;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PagesContentController extends Controller
{
    //Get the a specific pages content
    public function show(?string $page): JsonResponse
    {
        if (is_null($page)) {
            throw new HttpException(404, 'Please provide a page handler');
        }

        // /** @var Collection|null $entry */
        $entry = collect(Collection::findByHandle("pages")->queryEntries()->where('slug', $page)->with('content_blocks')->get())->toArray();

        if (!$entry) {
            throw new HttpException(404, 'Page not found!');
        }

        return response()->json([
            'entry' => $entry[0] ?? [],
        ]);
    }
}
