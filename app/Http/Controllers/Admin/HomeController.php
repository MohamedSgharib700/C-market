<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Repositories\UserRepository;
use App\Constants\UserTypes;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use View;
use App\Repositories\UserRepositories ;
use App\Repositories\BrandRepository ;
use App\Repositories\CategoryRepository ;
use App\Repositories\QuestionRepository ;
use App\Repositories\SponsorRepository ;
class HomeController extends BaseController
{
    
    protected $userRepository;
    protected $brandRepository;
    protected $categoryRepository;
    protected $questionRepository;
    protected $sponsorRepository;
    
  

    public function __construct(UserRepository $userRepository, BrandRepository $brandRepository, CategoryRepository $categoryRepository, QuestionRepository $questionRepository, SponsorRepository $sponsorRepository)
    { 
       $this->userRepository = $userRepository;  
       $this->brandRepository = $brandRepository;
       $this->categoryRepository = $categoryRepository;
       $this->questionRepository = $questionRepository;
       $this->sponsorRepository = $sponsorRepository;

    }

    public function index()
    {

        request()->query->set('active', 1);
        $usersCount      = $this->userRepository->search(request())->count();
        $categoriesCount =$this->categoryRepository->search(Request())->count();
        $brandsCount     =$this->brandRepository->search(Request())->count();
        $questionsCount  =$this->questionRepository->search(Request())->count();
        $sponsorsCount    =$this->sponsorRepository->search(Request())->count();
        return View::make('admin.home.index', compact('usersCount', 'categoriesCount', 'brandsCount', 'questionsCount', 'sponsorsCount'));
    }
}
