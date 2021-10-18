<?php

$session = new Session(Session\Configuration::set([
  'driver' => Session\Memcached\Handler::class,
  'salt_key' => hash('md5', random_bytes(4)),
  'name' => __FILE__
]));
