<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\PostView;
use App\Models\UpvoteDownvote;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // Total number of published posts
        $count = User::query()
            ->leftJoin('model_has_roles', 'model_id', '=', 'users.id')
            ->where('model_type', '=', User::class)
            ->whereNull('role_id')
            ->whereNotNull('email_verified_at')
            ->count();

        // Total number of published posts
        $count = Post::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->count();

        // Total number of views
        $views = PostView::query()
            ->join('posts', 'posts.id', '=', 'post_views.post_id')
            ->where('posts.active', '=', 1)
            ->whereDate('posts.published_at', '<', Carbon::now())
            ->count();

        // Upvotes/Downvotes
        $upvotes = UpvoteDownvote::query()
            ->join('posts', 'posts.id', '=', 'upvote_downvotes.post_id')
            ->where('posts.active', '=', 1)
            ->where('upvote_downvotes.is_upvote', '=', 1)
            ->whereDate('posts.published_at', '<', Carbon::now())
            ->count();

        $downvotes = UpvoteDownvote::query()
            ->join('posts', 'posts.id', '=', 'upvote_downvotes.post_id')
            ->where('posts.active', '=', 1)
            ->where('upvote_downvotes.is_upvote', '=', 0)
            ->whereDate('posts.published_at', '<', Carbon::now())
            ->count();


        return [
            Card::make('Number of Articles', $count),
            Card::make('Number of Views', $views),
            Card::make('Upvote/Downvote', $upvotes . '/' . $downvotes)
            ->description('lorem ipsum')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
        ];
    }
}
