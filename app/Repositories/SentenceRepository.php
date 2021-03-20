<?php

namespace App\Repositories;

use App\Models\Sentence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SentenceRepository
{

    /**
     * Get Sentences
     *
     * @param string $language_code1
     * @param string $language_code2
     * @param int $chapter_id
     *
     * @return array sentences list as array
     */
    public function get_sentence_list($language_code1, $language_code2, $chapter_id)
    {
        $data = DB::table('sentences')
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
     * Update Sentence
     *
     * @param string    $code1
     * @param string    $code2
     * @param array     $data
     *
     * @return boolean|Exception
     */
    public function update_sentence($code1, $code2, $data)
    {
        try {
            foreach ($data as $key => $language) {
                $word = Sentence::find($key);
                if (!is_null($word) && $code2 !== "en" ) {
                    $word->update([
                        $code2 => $language
                    ]);
                }
            }
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
        return true;
    }
}
