<?php

return new \PDO(
  'mysql:dbname=' . $eniac->get('database.database') . ';host=' . $eniac->get('database.host'),
  $eniac->get('database.username'),
  $eniac->get('database.password')
);
