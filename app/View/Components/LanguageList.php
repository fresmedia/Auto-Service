<?php

namespace App\View\Components;

use App\Repositories\LanguageRepository;
use Illuminate\View\Component;

class LanguageList extends Component {
    /**
     * Lanauages
     *
     * @var array
     */
    public $languages;

    /**
     * List Render Type
     *
     * @var string
     */
    public $type;

    /**
     * Except Languages ID List
     *
     * @var array $ids
     */
    public $ids;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $type, $ids ) {

        $languageRepository = new LanguageRepository();
        $this->type = $type;
        $this->ids = $ids;

        if ( $this->ids === "" || $ids === null ) {
            $this->ids = [];
        } else if ( is_numeric( $ids )) {
            $this->ids = [ $ids ];
        } else {
            $this->ids = $ids;
        }
        $this->languages = $languageRepository->get_languages( $this->ids );

        foreach ( $this->languages as $key => $language ) {
            $url = "";

            if ( $type === "detail" ) {
                $url = route('language.detail', $language->code);
            } else if( $type === "info" ) {
                $url = route('language.info', $language->code);
            } else if( $type === "conversion" ) {
                $id1_code = $languageRepository->get_language_detail( 'id', $ids )->code;
                $url = route('language.conversion', [$id1_code, $language->code]);
            }

            $language->url = $url;
            $this->languages[ $key ] = $language;
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.language-list');
    }
}
