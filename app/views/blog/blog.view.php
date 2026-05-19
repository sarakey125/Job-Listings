<?php
$posts = $posts ?? require __DIR__ . '/data/posts.php';
$active_post = $active_post ?? null;

if (!$active_post && isset($_GET['post'])) {
    $id = (int) $_GET['post'];
    foreach ($posts as $p) {
        if ($p['id'] === $id) {
            $active_post = $p;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/blog.css">
</head>

<body>

    <header>
        <div class="nav-inner">
            <a href="/blog" class="site-brand">still <span>becoming</span></a>
            <nav>
                <a href="/blog">Home</a>
                <a href="#about">About</a>
            </nav>
        </div>
    </header>

    <div class="page-return-link">
        <a href="/" class="back-link">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M19 12H5M12 5l-7 7 7 7" />
            </svg>
            Back to JobSeeker
        </a>
    </div>

    <?php if ($active_post): ?>

        <main>
            <div class="post-view">
                <a href="/blog" class="back-link">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 12H5M12 5l-7 7 7 7" />
                    </svg>
                    All entries
                </a>
                <div class="post-cat-label"><?= htmlspecialchars($active_post['category']) ?></div>
                <h1><?= htmlspecialchars($active_post['title']) ?></h1>
                <div class="post-meta-bar">
                    <span><?= htmlspecialchars($active_post['date']) ?></span>
                    <span>·</span>
                    <span><?= htmlspecialchars($active_post['reading_time']) ?></span>
                </div>
                <div class="post-body">
                    <?php
                    $paragraphs = explode("\n\n", $active_post['content']);
                    foreach ($paragraphs as $para) {
                        $para = htmlspecialchars(trim($para));
                        $para = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $para);
                        echo "<p>$para</p>";
                    }
                    ?>
                </div>
            </div>
        </main>

    <?php else: ?>

        <div class="hero">
            <div class="hero-eyebrow">Personal Journal</div>
            <h1>Finding the way<br><em>through the dark</em></h1>
            <p>Honest words about hardship, healing, and the slow, sacred work of becoming who you're meant to be.</p>
            <a href="#posts" class="hero-cta">Read the journal ↓</a>
        </div>

        <div class="page-wrap" id="posts">
            <main>
                <div class="section-label">Featured</div>

                <?php
                $featured = null;
                $rest = [];
                foreach ($posts as $p) {
                    if ($p['featured'] && !$featured) {
                        $featured = $p;
                    } else {
                        $rest[] = $p;
                    }
                }
                ?>

                <?php if ($featured): ?>
                    <a href="/blog?post=<?= $featured['id'] ?>" style="text-decoration:none;" class="featured-card">
                        <div class="featured-inner">
                            <div class="featured-meta">
                                <span class="cat-badge"><?= htmlspecialchars($featured['category']) ?></span>
                                <span class="meta-date"><?= htmlspecialchars($featured['date']) ?></span>
                            </div>
                            <h2><?= htmlspecialchars($featured['title']) ?></h2>
                            <p class="excerpt"><?= htmlspecialchars($featured['excerpt']) ?></p>
                            <span class="read-link">
                                Continue reading
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </a>
                <?php endif; ?>

                <div class="section-label">All Entries</div>
                <div class="post-list">
                    <?php foreach ($rest as $post): ?>
                        <a href="/blog?post=<?= $post['id'] ?>" class="post-item">
                            <div class="post-item-meta">
                                <span class="post-cat"><?= htmlspecialchars($post['category']) ?></span>
                                <span class="post-dot"></span>
                                <span class="post-date"><?= htmlspecialchars($post['date']) ?></span>
                            </div>
                            <h3><?= htmlspecialchars($post['title']) ?></h3>
                            <p><?= htmlspecialchars($post['excerpt']) ?></p>
                            <span class="reading-time"><?= htmlspecialchars($post['reading_time']) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </main>

            <aside class="sidebar" id="about">
                <div class="about-card">
                    <div class="avatar">S</div>
                    <h3>Sarrah Quijano</h3>
                    <div class="tagline">Writer · Still Here</div>
                    <p>I write about the parts of life we don't commonly post about. Grief, rebuilding, and the quiet victories that no one sees. This is my honest corner of the internet.</p>
                </div>

                <div class="topics-card">
                    <h4>Topics</h4>
                    <div class="topic-tags">
                        <a href="#" class="topic-tag">Healing</a>
                        <a href="#" class="topic-tag">Grief</a>
                        <a href="#" class="topic-tag">Growth</a>
                        <a href="#" class="topic-tag">Reflection</a>
                        <a href="#" class="topic-tag">Resilience</a>
                        <a href="#" class="topic-tag">Perspective</a>
                        <a href="#" class="topic-tag">Self-worth</a>
                    </div>
                </div>

                <div class="quote-card">
                    <blockquote>"The wound is the place where the light enters you."</blockquote>
                    <cite>- Rumi</cite>
                </div>
            </aside>
        </div>

    <?php endif; ?>

    <footer>
        <p>Still Becoming &nbsp;·&nbsp; Written with <span>♡</span> &nbsp;·&nbsp; <?= date('Y') ?></p>
    </footer>

</body>

</html>