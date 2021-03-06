<?php

$scale_max = 0;

require 'includes/graphs/common.inc.php';

$rrdfilename = rrd_name($device['hostname'], 'sub10systems');


if (rrdtool_check_rrd_exists($rrdfilename)) {
    $rrd_options .= " COMMENT:'dB                         Now    Min     Max\\n'";
    $rrd_options .= ' DEF:sub10RadioLclVectEr='.$rrdfilename.':sub10RadioLclVectEr:AVERAGE ';
    $rrd_options .= " LINE1:sub10RadioLclVectEr#CC0000:'Vector Error         ' ";
    $rrd_options .= ' GPRINT:sub10RadioLclVectEr:LAST:%3.2lf ';
    $rrd_options .= ' GPRINT:sub10RadioLclVectEr:MIN:%3.2lf ';
    $rrd_options .= ' GPRINT:sub10RadioLclVectEr:MAX:%3.2lf\\\l ';
}
