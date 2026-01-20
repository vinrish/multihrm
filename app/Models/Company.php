<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $id
 * @property-read string $name
 * @property-read string $email
 * @property-read string $status
 * @property-read string|null $phone
 * @property-read string|null $address
 * @property-read string|null $logo
 * @property-read string|null $website
 * @property-read string|null $description
 * @property-read string|null $industry
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory, HasUuids;

    protected $table = 'companies';

    protected $guarded = [];

    /** @return array<string, string> */
    public function casts(): array
    {
        return [
            'id' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
