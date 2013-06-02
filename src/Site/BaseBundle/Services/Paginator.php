<?php
/**
 * Date: 02/06/13
 * Time: 20:32
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\BaseBundle\Services;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;

class Paginator
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    protected $total;
    protected $numPages;
    protected $offset;
    protected $page;
    protected $limit;
    protected $allValues;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function paginateCollection(Collection $collection, $page, $limit)
    {
        if($page == 0){
            $page = 1;
        }
        if($limit == 0){
            $limit = 1;
        }
        $this->allValues = $collection;
        $this->total = count($collection);
        $this->page = (int) $page;
        $this->limit = (int) $limit;
        $this->offset = $limit * ($page - 1);
        $this->calculPages();
    }

    protected function calculPages()
    {
        if($this->total > 0){
            $this->numPages = floor($this->total / $this->limit);
            if(0 < $this->total%$this->limit){
                $this->numPages += 1;
            }
        } else {
            $this->numPages = 0;
        }
    }

    public function getPagesTotal()
    {
        return $this->numPages;
    }

    public function getResults()
    {
        if($this->allValues instanceof Collection ){
            return $this->allValues->slice($this->offset, $this->limit);
        }
    }
}
