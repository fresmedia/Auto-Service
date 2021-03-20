<?php

namespace App\Repositories;

use App\Models\Word;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WordRepository
{

    /**
     * Get Words
     *
     * @param string $language_code1
     * @param string $language_code2
     * @param int $chapter_id
     *
     * @return array words list as array
     */
    public function get_word_list($language_code1, $language_code2, $chapter_id)
    {
        $data = DB::table('words')
            ->select(
                'id',
                'en as default',
                "$language_code1 as name1",
                "$language_code2 as name2",
            )
            ->where('chapter_id', intval($chapter_id))
            ->get();
        return $data;
    }

    /**
     * Update Word
     *
     * @param string $code1
     * @param string $code2
     * @param string $data
     *
     * @return boolean|exception
     */
    public function update_word($code1, $code2, $data)
    {
        try {
            foreach ($data as $key => $language) {
                $word = Word::find($key);
                if (!is_null($word) && $code2 !== "en" ) {
                    $word->update([
                        $code2 => $language
                    ]);
                }
            }
        } catch (\Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return true;
    }
}
