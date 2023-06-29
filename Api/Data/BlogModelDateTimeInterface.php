<?php

namespace Omnipro\Blog\Api\Data;

use DateTime;

interface BlogModelDateTimeInterface
{
    public function getCreatedAt(): DateTime;
    public function getUpdatedAt(): DateTime;
}
