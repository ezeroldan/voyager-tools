<?php

namespace App\Widgets;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

abstract class AdminDimmer extends AbstractWidget
{

    protected $icon = null;
    protected $text = '';
    protected $title = '';
    protected $model = null;
    protected $table = null;
    protected $image = 'images/widget-backgrounds/01.jpg';
    protected $button = 'Ver M&aacute;s';
    protected $route = null;
    protected $config = [];

    protected abstract function setup(): void;

    public function __construct(array $config = [])
    {
        $this->setup();

        parent::__construct($config);
    }

    final public function run(): View
    {
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => $this->icon,
            'title'  => $this->title,
            'text'   => $this->text,
            'image'  => $this->image,
            'button' => [
                'text' => $this->button,
                'link' => route($this->route),
            ]
        ]));
    }

    public function shouldBeDisplayed(): bool
    {
        return Auth::user()->can('browse', new $this->model());
    }

    protected function setModel(string $model): self
    {
        $this->model = $model;
        $this->table = with(new $model())->getTable();
        $route = "voyager.{$this->table}.index";
        $this->setRoute($route);

        $icon = DB::table('menu_items')->where('route', $route)->value('icon_class');
        $this->setIcon($icon);

        $this->setImage("widgets/{$this->table}.jpg");

        return $this;
    }

    private function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    protected function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    protected function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    private function setImage(string $image): self
    {
        $this->image = Voyager::image($image);
        return $this;
    }

    protected function setButton(string $button): self
    {
        $this->button = $button;
        return $this;
    }

    private function setRoute(string $route): self
    {
        $this->route = $route;
        return $this;
    }
}
