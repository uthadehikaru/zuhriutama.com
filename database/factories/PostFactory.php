<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);
        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => fake()->paragraph(),
            'content' => "# Heading 1
## Heading 2
### Heading 3
#### Heading 4
##### Heading 5
###### Heading 6

*Bold*
_italic_
~~Strikethrough~~
**_bold and italic_**

* List 1
* List 2
* List 3

1. Number 1
2. Number 2
3. Number 3

[Link](https://www.google.com)

![Alt text](/assets/ahmad-zuhri-utama.jpg)

`Inline code`

> Blockquote

Horizontal Rules
---

| Header 1 | Header 2 |
| -------- | -------- |
| Row 1    | Data     |
| Row 2    | Data     |

- [x] Completed task
- [ ] Incomplete task",
            'is_published' => true,
            'published_at' => fake()->dateTime(),
            'thumbnail' => null,
        ];
    }
}
