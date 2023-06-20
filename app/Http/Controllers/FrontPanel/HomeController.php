<?php

namespace App\Http\Controllers\FrontPanel;

use App\Http\Controllers\Controller;

use App\Models\CravingImage;
use App\Models\PackageType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image;

class HomeController extends Controller
{
    public function index(): Response
    {
        $title = 'Home';
        $packageTypes = PackageType::where('status', 'Active')->get();
        return response()->view('FrontPanel.home', compact('title', 'packageTypes'), Response::HTTP_OK);
    }

    public function getCravingImage(Request $request): JsonResponse
    {
        try {

            $cravingImage = CravingImage::where('package_type_id', $request->get('package_type_id'))->first();
            return response()->json(['payload' => $cravingImage], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function craveOnImage(Request $request): JsonResponse
    {
        $request->validate([
            'package_type_id' => [
                'required',
                'numeric'
            ],
            'chip_text' => [
                'required',
                'string',
            ],
//            'x_coordinate' => [
//                'required',
//                'numeric'
//            ],
//            'y_coordinate' => [
//                'required',
//                'numeric'
//            ],
//            'text_angle' => [
//                'required',
//                'numeric'
//            ],
//            'text_color' => [
//                'required',
//                'string'
//            ],
//            'font_family' => [
//                'required',
//                'string'
//            ],
            'text_size' => [
                'required',
                'numeric'
            ]
        ]);
        try {
            $cravingImage = CravingImage::where('package_type_id', $request->get('package_type_id'))->with(['packageType'])->first();
            $img = Image::make(storage_path('app/public/' . $cravingImage->path));

//            list($left,, $right) = imagettfbbox($request->get('text_size'), 0, storage_path('app/public/fonts/roboto/Roboto-Regular.ttf'), $request->get('chip_text'));
//
//            $textWidth = $right - $left;
//            $imageWidth = $img->width();
//            $imageHeight = $img->height();



            $x = ($img->width() / 2) + $cravingImage->width;
            $y = ($img->height() / 2) + $cravingImage->height;
            $angle = $cravingImage->angle;
//            $img->text($request->get('chip_text'), $request->get('x_coordinate'), $request->get('y_coordinate'), function ($font) use($request) {
            $img->text($request->get('chip_text'), $x, $y, function ($font) use($request, $angle) {
//                if ($request->get('font_family') === 'Roboto') {
//                    $font->file(storage_path('app/public/fonts/roboto/Roboto-Regular.ttf'));
//                }
//                if ($request->get('font_family') === 'Open Sans') {
//                    $font->file(storage_path('app/public/fonts/open-sans/OpenSans-Regular.ttf'));
//                }
//                if ($request->get('font_family') === 'Prompt') {
//                    $font->file(storage_path('app/public/fonts/prompt/Prompt-Regular.ttf'));
//                }
                $font->file(storage_path('app/public/fonts/roboto/Roboto-Regular.ttf'));
                $font->size($request->get('text_size'));
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('middle');
//                $font->color($request->get('text_color'));
//                $font->angle($request->get('text_angle'));
                $font->angle($angle);
            });
            $fileName = time() . '.png';
            $img->save(storage_path('app/public/images/craving/' . $fileName), 100);
            return response()->json(['payload' => ['file' => $fileName]], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
