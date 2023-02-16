<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\FailImportFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardImportRequest;
use App\Services\CardImportService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CardImportController extends Controller
{
    /**
     * @throws FailImportFailedException
     */
    public function __invoke(CardImportRequest $request, CardImportService $cardImportService)
    {
        $cardImportService->importFile($request->getFile(), $request->getUrlToFileSending());

        $this->success(status: ResponseAlias::HTTP_ACCEPTED);
    }
}
