<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Statamic\Entries\Collection;
use Symfony\Component\HttpKernel\Exception\HttpException;


class PagesContentController extends Controller
{
    //Get the a specific pages content
    public function show(?string $page): JsonResponse
    {
        if (is_null($page)) {
            throw new HttpException(404, 'Please provide a page handler');
        }

        /** @var Entry|null $entry */
        $entry = Collection::find($page)->entries()->first() ?? null;

        return response()->json([
            'entry' => $entry,
        ]);
    }
}
