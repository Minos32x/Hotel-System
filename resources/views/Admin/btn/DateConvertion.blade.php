<?php
$timestamp = strtotime($model->created_at);
echo date('d-m-Y', $timestamp);