<?= loadPartial("head"); ?>

<?= loadPartial("navbar"); ?>

<?php
// Jobseeker Ternary Examples
$example1 = "isset(\$listings) ? \$listings : []";
$example2 = "\$listing->city ?: \$listing->state ?: \$listing->address";
$example3 = "is_object(\$listing) ? \$listing : (object) (\$listing ?? [])";
$example4 = "\$workMode === 'remote' ? 'Remote-first' : (\$workMode === 'hybrid' ? 'Hybrid' : 'On-site')";
?>

<main class="flex-1 py-10">
    <div class="mx-auto max-w-6xl px-4">
        <header class="mb-6 grid gap-5 rounded-2xl border border-slate-200 bg-white/90 p-6 shadow-sm lg:grid-cols-[1fr_18rem] lg:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-700">PHP Ternary Lab</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-950">Jobseeker Ternary Examples</h1>
                <p class="mt-2 max-w-2xl text-sm leading-relaxed text-slate-500">
                    Real ternary expressions used throughout the Jobseeker application. Clean conditionals for practical results.
                </p>
            </div>
            <div class="rounded-2xl bg-slate-950 p-4 text-white">
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-100">Learn from</p>
                <p class="mt-2 text-2xl font-black">4 Examples</p>
                <p class="mt-1 text-xs text-slate-300">Real production code</p>
            </div>
        </header>

        <section class="grid gap-6">
            <div class="space-y-4">
                <!-- Example 1 -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4">
                        <p class="text-sm font-semibold uppercase tracking-wider text-brand-700 mb-2">Example 1: Safe Array Access</p>
                        <p class="text-slate-600 mb-3">Used in: <code class="bg-slate-100 px-2 py-1 rounded text-xs">home.view.php</code></p>
                        <div class="rounded-xl bg-slate-950 p-4">
                            <code class="text-xs text-slate-300 block whitespace-pre-wrap">&lt;?php foreach (isset($listings) ? $listings : [] as $listing): ?&gt;</code>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-500 mb-1">Purpose:</p>
                        <p class="text-sm text-slate-700">Checks if $listings variable exists before iterating. Returns empty array as fallback to prevent errors.</p>
                    </div>
                </div>

                <!-- Example 2 -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4">
                        <p class="text-sm font-semibold uppercase tracking-wider text-brand-700 mb-2">Example 2: Cascading Fallback</p>
                        <p class="text-slate-600 mb-3">Used in: <code class="bg-slate-100 px-2 py-1 rounded text-xs">show.view.php</code></p>
                        <div class="rounded-xl bg-slate-950 p-4">
                            <code class="text-xs text-slate-300 block whitespace-pre-wrap">&lt;strong&gt;Location:&lt;/strong&gt; &lt;?= htmlspecialchars($listing->city ?: $listing->state ?: $listing->address) ?&gt;</code>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-500 mb-1">Purpose:</p>
                        <p class="text-sm text-slate-700">Displays location with fallback chain: city → state → address. Uses Elvis operator (?:) for concise null coalescing.</p>
                    </div>
                </div>

                <!-- Example 3 -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4">
                        <p class="text-sm font-semibold uppercase tracking-wider text-brand-700 mb-2">Example 3: Type Checking & Casting</p>
                        <p class="text-slate-600 mb-3">Used in: <code class="bg-slate-100 px-2 py-1 rounded text-xs">show.view.php</code></p>
                        <div class="rounded-xl bg-slate-950 p-4">
                            <code class="text-xs text-slate-300 block whitespace-pre-wrap">&lt;?php $listing = is_object($listing) ? $listing : (object) ($listing ?? []); ?&gt;</code>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-500 mb-1">Purpose:</p>
                        <p class="text-sm text-slate-700">Ensures $listing is an object. If it's already an object, keeps it; otherwise converts array to object. Handles null cases gracefully.</p>
                    </div>
                </div>

                <!-- Example 4 -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4">
                        <p class="text-sm font-semibold uppercase tracking-wider text-brand-700 mb-2">Example 4: Nested Conditionals</p>
                        <p class="text-slate-600 mb-3">Used in: <code class="bg-slate-100 px-2 py-1 rounded text-xs">ternary.view.php</code></p>
                        <div class="rounded-xl bg-slate-950 p-4">
                            <code class="text-xs text-slate-300 block whitespace-pre-wrap">$modeLabel = $workMode === 'remote' ? 'Remote-first' : ($workMode === 'hybrid' ? 'Hybrid' : 'On-site');</code>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-500 mb-1">Purpose:</p>
                        <p class="text-sm text-slate-700">Maps work mode values to user-friendly labels using nested ternary expressions. Clean alternative to if-else chains.</p>
                    </div>
                </div>
            </div>

            <!-- Key Takeaways -->
            <div class="rounded-2xl border border-brand-200 bg-brand-50 p-5 shadow-sm sm:p-6">
                <p class="text-sm font-semibold uppercase tracking-wider text-brand-700 mb-4">Key Takeaways</p>
                <ul class="space-y-2 text-sm text-slate-700">
                    <li class="flex gap-3">
                        <span class="text-brand-700 font-bold">•</span>
                        <span>Use ternaries for simple true/false decisions, not complex logic</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-brand-700 font-bold">•</span>
                        <span>Elvis operator (?:) is great for null coalescing with fallbacks</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-brand-700 font-bold">•</span>
                        <span>Nest ternaries sparingly—readability matters more than conciseness</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-brand-700 font-bold">•</span>
                        <span>Always provide sensible defaults to prevent errors</span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</main>

<?= loadPartial("footer"); ?>