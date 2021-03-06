<?php
namespace TJM\Bundle\BaseBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class TJMBaseExtension extends Extension{
	/**
	 * {@inheritDoc}
	 */
	public function load(array $configs, ContainerBuilder $container){
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);
//var_dump($configs);die();
		$pageWraps = Array(
			"bare"=> "@TJMBase/skeletons/bare.html.twig"
			,"simple"=> "@TJMBase/skeletons/simple.html.twig"
			,"full"=> "@TJMBase/skeletons/full.html.twig"
		);
		if(array_key_exists("page_wraps", $config)){
			$pageWraps = array_merge($pageWraps, $config["page_wraps"]);
		}
		$container->setParameter("tjm_base.wraps", $pageWraps);
		// $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		// $loader->load('services.yml');
	}
}
