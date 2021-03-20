<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\SentenceRepository;
use App\Repositories\TermRepository;
use App\Repositories\WordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranslationsAPIController extends Controller {

    public $languageRepository;
    public $categoryRepository;
    public $wordRepository;
    public $sentenceRepository;
    public $termRepository;

    function __construct(LanguageRepository $languageRepository, CategoryRepository $categoryRepository, WordRepository $wordRepository, SentenceRepository $sentenceRepository, TermRepository $termRepository)
    {
        $this->languageRepository = $languageRepository;
        $this->categoryRepository = $categoryRepository;
        $this->wordRepository     = $wordRepository;
        $this->sentenceRepository = $sentenceRepository;
        $this->termRepository     = $termRepository;
    }

    /**
     * Get Translation API Data
     *
     * @param Request $request
     *
     * @return void
     */
    public function getTranslationDataByChapter(Request $request)
    {
        $request->validate([
            'chapter_id' => 'required',
            'type'       => 'required'
        ]);

        $user        = Auth::user();
        $language_id = $request->language_id;

        if( ! empty( $language_id ) ) {
            $detail1 = $this->languageRepository->get_language_detail('code', 'en');
            $detail2 = $this->languageRepository->get_language_detail('id', $language_id);
            $chapter = $this->categoryRepository->get_category_detail('id', $request->chapter_id);

            if (!is_null($detail1) && !is_null($detail2) && !is_null($chapter)) {
                $type      = $request->type;

                if( $type === "word"){
                    $words     = $this->wordRepository->get_word_list($detail1->code, $detail2->code, $chapter->id);
                    return view('backend.pages.translations.partials.translation-list', compact('words', 'type', 'detail1', 'detail2'));
                } else if( $type === "sentence"){
                    $sentences = $this->sentenceRepository->get_sentence_list($detail1->code, $detail2->code, $chapter->id);
                    return view('backend.pages.translations.partials.translation-list', compact('sentences', 'type', 'detail1', 'detail2'));
                } else if( $type === "term"){
                    $terms = $this->termRepository->get_term_list($detail1->code, $detail2->code);
                    return view('backend.pages.translations.partials.translation-list', compact('terms', 'type', 'detail1', 'detail2'));
                }
            }
        } else {
            session()->flash( 'error', 'Please select a language' );
            return null;
        }
        return back();

        // if (!is_null($detail1) && !is_null($detail2) && !is_null($chapter)) {
        //     $words              = $this->wordRepository->get_word_list($code1, $code2, $chapter->id);
        //     $sentences          = $this->sentenceRepository->get_sentence_list($code1, $code2, $chapter->id);
        //     // $related_categories = $this->categoryRepository->get_related_categories($chapter);

        //     return view('frontend.pages.categories.translation', compact('detail1', 'detail2', 'chapter', 'words', 'sentences'));
        // }

    }
}
