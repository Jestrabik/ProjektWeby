<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Players extends BaseConfig
{
    public int $perPage = 8; // počet hráčů na stránku
}