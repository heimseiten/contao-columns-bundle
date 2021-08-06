<?php

declare(strict_types=1);

namespace Heimseiten\ContaoColumnsBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class HeimseitenContaoColumnsBundle
 */
class HeimseitenContaoColumnsBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
		
	}
}
