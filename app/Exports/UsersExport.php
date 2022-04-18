<?php

namespace App\Exports;

use App\Models\User;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class UsersExport implements FromQuery, WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable,ExportStyle;

    public function query()
    {
        $users=User::query();
        return $users;
    }
    // public function headings(): array
    // {
    //     return [
    //         'User_id',
    //         'User Name',
    //         'Email',
    //         'email_verified_at',
    //         'Expire',
    //         'Role',
    //         'RoleData',
    //         'StatusOnline',
    //         'IsOnline',
    //     ];
    // }
/*
    $users = DB::table('users')
                ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                ->get();

    $users = DB::table('users')
                ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
                ->get();
    Inner Join 	: ->join('contacts', 'users.id', '=', 'contacts.user_id')
    Left Join 	: ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
    Right Join 	: ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
    Cross Join 	: ->crossJoin('colors')

    Advance Queries :
    -----------------
            ->join('contacts', function ($join) {
                $join->on('users.id', '=', 'contacts.user_id')
                    ->where('contacts.user_id', '>', 5);
            })
   */
}
