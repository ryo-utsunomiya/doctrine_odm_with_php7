<?php

namespace AppBundle\Command;

use AppBundle\Document\Product;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MongoDBTestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:mongo-test')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $product = new Product();
//        $product->setName('Foobar');
//        $product->setPrice(19.99);
//
//        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
//        $dm->persist($product);
//        $dm->flush();
//
//        var_dump($product->getId());
        
        $product = $this->getContainer()
            ->get('doctrine_mongodb')
            ->getRepository('AppBundle:Product')
            ->findOneBy(['name' => 'Foobar']);
        
        if (!$product) {
            $output->writeln('Product not found');
        }
        
        var_dump($product->getName(), $product->getPrice());
    }
}
