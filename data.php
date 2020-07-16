<?php

/**
 * @param $filename File of data
 * @return array Array of data
 * @throws Exception Error file not found
 */
function read_file($filename)
{
if (!file_exists($filename)) throw new \Exception($filename . ' not found.');
    $data = file($filename);
    return array_map(fn ($item) => unserialize($item), $data);
}

/**
* @param array $data Data to write into the file
* @param string $filename File of data
* @return int Boolean for know if the file is writed
*/
function write_file($data, $filename)
{
    $data = array_map(fn ($item) => serialize($item), $data);
    return file_put_contents($filename, implode(PHP_EOL, $data));
}