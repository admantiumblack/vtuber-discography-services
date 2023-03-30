<?php

namespace App\Utils;

class Metadata
{
    public static function generate_metadata($url, $query, $request)
    {
        $next_offset = $query['offset'] + $query['limit'];
        $prev_offset = $query['offset'] - $query['limit'];

        if ($request->has('include_groups'))
        {
            $metadata = [
                'next_link' => $url . '?'
                    . 'limit=' . $query['limit']
                    . '&' . 'offset=' . $next_offset
                    . '&' . 'include_groups=' . $query['include_groups'],
                'prev_link' => null,
            ];

            if ($prev_offset >= 0)
            {
                $metadata['prev_link'] = $url . '?'
                    . 'limit=' . $query['limit']
                    . '&' . 'offset=' . $prev_offset
                    . '&' . 'include_groups=' . $query['include_groups'];
            }
        }

        if (!$request->has('include_groups'))
        {
            $metadata = [
                'next_link' => $url . '?'
                    . 'limit=' . $query['limit']
                    . '&' . 'offset=' . $next_offset,
                'prev_link' => null,
            ];

            if ($prev_offset >= 0)
            {
                $metadata['prev_link'] = $url . '?'
                    . 'limit=' . $query['limit']
                    . '&' . 'offset=' . $prev_offset;
            }
        }

        return $metadata;
    }
}
