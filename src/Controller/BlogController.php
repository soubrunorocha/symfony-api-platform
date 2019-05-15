<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{

    private const POSTS = [
        [
            "id" => 1,
            "slug" => "hello-world",
            "title" => "Hello World!"
        ],
        [
            "id" => 2,
            "slug" => "another-post",
            "title" => "This is another post!"
        ],
        [
            "id" => 3,
            "slug" => "last-example",
            "title" => "This is the last example"
        ]
    ];

    /**
     *
     * @return void
     * 
     * @Route("/", name="blog_list")
     */
    public function list()
    {
        return new JsonResponse(self::POSTS);
    }

    /**
     *
     * @return void
     * 
     * @Route("/{id}", name="blog_by_id", requirements={"id"="\d+"})
     */
    public function post($id)
    {
        return new JsonResponse(
            self::POSTS[array_search($id, array_column(self::POSTS, "id"))]
        );
    }
    
    /**
     *
     * @return void
     * 
     * @Route("/{slug}", name="blog_by_slug")
     */
    public function postBySlug($slug)
    {
        return new JsonResponse(
            self::POSTS[array_search($slug, array_column(self::POSTS, "slug"))]
        );
    }

}