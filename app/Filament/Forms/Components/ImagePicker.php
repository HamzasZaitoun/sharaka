<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\File;

class ImagePicker extends Select
{
    protected string $imageDirectory = 'images';

    public static function make(string $name): static
    {
        $instance = parent::make($name);
        $instance->options(function () use ($instance) {
            return $instance->getImageOptions();
        });
        $instance->searchable();
        $instance->getOptionLabelUsing(function ($value) {
            return $value ? basename($value) : null;
        });
        
        return $instance;
    }

    public function imageDirectory(string $directory): static
    {
        $this->imageDirectory = $directory;
        return $this;
    }

    protected function getImageOptions(): array
    {
        $path = public_path($this->imageDirectory);
        
        if (!File::exists($path)) {
            return [];
        }

        $files = File::files($path);
        $options = ['' => 'Select an image...'];

        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
                $relativePath = $this->imageDirectory . '/' . $file->getFilename();
                $options[$relativePath] = $file->getFilename();
            }
        }

        return $options;
    }

    public function getOptionLabelUsing(?\Closure $callback): static
    {
        return parent::getOptionLabelUsing($callback);
    }
}

