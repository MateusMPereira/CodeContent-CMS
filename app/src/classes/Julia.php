<?php

class Julia
{
    public static function mergeDataView(string $view, array $data)
    {
        $sanitizedViewContent = $view;
        foreach ($data as $key => $value) {
            $sanitizedViewContent = str_replace('{{' . $key . '}}', $value, $sanitizedViewContent);
        }
        return $sanitizedViewContent;
    }
}
