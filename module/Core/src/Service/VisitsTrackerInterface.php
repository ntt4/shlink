<?php

declare(strict_types=1);

namespace Shlinkio\Shlink\Core\Service;

use Laminas\Paginator\Paginator;
use Shlinkio\Shlink\Core\Entity\ShortUrl;
use Shlinkio\Shlink\Core\Entity\Visit;
use Shlinkio\Shlink\Core\Exception\ShortUrlNotFoundException;
use Shlinkio\Shlink\Core\Exception\TagNotFoundException;
use Shlinkio\Shlink\Core\Model\ShortUrlIdentifier;
use Shlinkio\Shlink\Core\Model\Visitor;
use Shlinkio\Shlink\Core\Model\VisitsParams;

interface VisitsTrackerInterface
{
    public function track(ShortUrl $shortUrl, Visitor $visitor): void;

    /**
     * @return Visit[]|Paginator
     * @throws ShortUrlNotFoundException
     */
    public function info(ShortUrlIdentifier $identifier, VisitsParams $params): Paginator;

    /**
     * @return Visit[]|Paginator
     * @throws TagNotFoundException
     */
    public function visitsForTag(string $tag, VisitsParams $params): Paginator;
}
