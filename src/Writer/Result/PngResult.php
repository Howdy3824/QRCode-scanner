<?php

declare(strict_types=1);

namespace Endroid\QrCode\Writer\Result;

final class PngResult extends AbstractGdResult
{
    public const RESULT_OPTION_QUALITY = 'result_quality';

    protected function initOptions(): void
    {
        if (!isset($this->options[self::RESULT_OPTION_QUALITY])) {
            $this->options[self::RESULT_OPTION_QUALITY] = -1;
        }
    }

    public function getString(): string
    {
        ob_start();
        imagepng($this->image, quality: $this->options[self::RESULT_OPTION_QUALITY]);

        return (string) ob_get_clean();
    }

    public function getMimeType(): string
    {
        return 'image/png';
    }
}
