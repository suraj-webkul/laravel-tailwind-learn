<?php 

namespace Webkul\Admin\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'Webkul\Admin\Models\Category';
    }   
}

?>