<?php

namespace App\Functions;

use App\Models\ProductFile;
use App\Models\ProductViews;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Core
{
    public const CURRENCY = "MAD";
    public const CATEGORY = "CATEGORY";
    public const PRODUCT = "PRODUCT";
    public const BRAND = "BRAND";
    public const SLIDE = "SLIDE";

    public const CATEGORY_PATH = "categories";
    public const PRODUCT_PATH = "products";
    public const BRAND_PATH = "brands";
    public const SLIDE_PATH = "slides";

    public static function lang($lang = null)
    {
        return $lang ? app()->getLocale() == $lang : app()->getLocale();
    }

    public static function route($str)
    {
        return Str::contains(request()->path(), 'admin/' . $str);
    }

    public static function slug($str)
    {
        return Str::slug($str);
    }

    public static function gender()
    {
        return ['male', 'female'];
    }

    public static function states()
    {
        return ['available', 'not available'];
    }

    public static function units()
    {
        return [
            'length / dimensions' => [
                'centimeter (cm)',
                'inch (in)',
                'meter (m)',
                'feet (ft)'
            ],
            'weight / mass' => [
                'kilogram (kg)',
                'pound (lb)',
                'ounce (oz)',
                'gram (g)'
            ],
            'thickness' => [
                'millimeter (mm)',
                'inch (in)'
            ],
            'packaging' => [
                'unit'
            ],
            'capacity' => [
                'fluid ounces (fl oz)',
                'gallons (gal)',
                'quarts (qt)',
                'liters (L)'
            ],
            'count' => [
                'pieces (pcs)',
                'dozen (dz)',
                'gross (gr)'
            ],
            'area' => [
                'square inches (in²)',
                'square meters (m²)',
                'square feet (ft²)'
            ]
        ];
    }

    public static function files($type)
    {
        $path = "public/";
        $model = null;

        switch ($type) {
            case Core::CATEGORY:
                $path .= Core::CATEGORY_PATH;
                $model = Category::class;
                break;
            case Core::PRODUCT:
                $path .= Core::PRODUCT_PATH;
                $model = ProductFile::class;
                break;
            case Core::BRAND:
                $path .= Core::BRAND_PATH;
                $model = Brand::class;
                break;
            case Core::SLIDE:
                $path .= Core::SLIDE_PATH;
                $model = Slide::class;
                break;
        }

        return new class($path, $model)
        {
            private $path;
            private $model;

            private function clear($path)
            {
                if (Storage::exists($this->path . '/' . $path)) {
                    Storage::delete($this->path . '/' . $path);
                }
            }

            private function save($file)
            {
                $path = Storage::putFile($this->path, $file);
                $name = substr($path, strlen($this->path) + 1);
                $type = $file->getClientMimeType();
                $size = $file->getSize();

                return [$name, $type, $size];
            }

            public function __construct($path, $model)
            {
                $this->path = $path;
                $this->model = $model;
            }

            public function get($data)
            {
                return Storage::url($this->path . '/' . $data);
            }

            public function del($data)
            {
                if (is_array($data)) {
                    $files = $this->model::where($data[0], $data[1])->get();
                    foreach ($files as $file) {
                        $this->clear($file->name);
                        $file->delete();
                    }
                } else {
                    $this->clear($data);
                }
            }

            public function set($files, $data = null)
            {
                if (is_array($data)) {
                    foreach ($files as $file) {
                        list($name, $type, $size) = $this->save($file);
                        $arr = [
                            'name' => $name,
                            'type' => $type,
                            'size' => $size
                        ];

                        if (count($data) == 2) $arr[$data[0]] = $data[1];

                        $this->model::create($arr);
                    }
                } else {
                    list($name, $type, $size) = $this->save($files);
                    return $name;
                }
            }
        };
    }

    public static function views($product)
    {
        $Current = ProductViews::where('remote', request()->ip())->where('product', $product)->first();
        if ($Current) {
            $Current->update([
                'count' => $Current->count + 1
            ]);
        } else {
            ProductViews::create([
                'product' => $product,
                'remote' => request()->ip(),
            ]);
        }
    }
}
