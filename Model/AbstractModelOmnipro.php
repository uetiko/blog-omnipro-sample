<?php

namespace Omnipro\Blog\Model;

use DateTime;
use DateTimeZone;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class AbstractModelOmnipro extends AbstractModel
{
    protected const CREATED_AT = 'created_at';
    protected const UPDATED_AT = 'updated_at';
    protected TimezoneInterface $timezone;
    protected string $timezoneConfig;

    public function __construct(
        TimezoneInterface $timezone,
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
        $this->timezone = $timezone;
        $this->timezoneConfig = $this->timezone->getConfigTimezone();
    }

    public function getCreatedAt(): DateTime
    {
        $date = new DateTime(
            $this->getDataByKey(static::CREATED_AT),
            new DateTimeZone('UTC')
        );
        $date->setTimezone(new DateTimeZone($this->timezoneConfig));
        return $date;
    }

    public function getUpdatedAt(): DateTime
    {
        $date = new DateTime(
            $this->getDataByKey(static::UPDATED_AT),
            new DateTimeZone('UTC')
        );
        $date->setTimezone(new DateTimeZone($this->timezoneConfig));
        return $date;
    }
}
