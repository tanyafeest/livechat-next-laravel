<?php

namespace ARKEcosystem\UserInterface\Components;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use ARKEcosystem\UserInterface\NumberFormatter\NumberFormatter;

final class Currency extends Component
{
    private string $currency;

    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    public function render(): Closure
    {
        return function (array $data): string {
            $decimals = null;

            if (Arr::has($data, 'attributes.decimals')) {
                $decimals = (int) Arr::get($data, 'attributes.decimals');
            }

            return NumberFormatter::new()->formatWithCurrencyCustom(trim((string) $data['slot']), $this->currency, $decimals);
        };
    }
}
