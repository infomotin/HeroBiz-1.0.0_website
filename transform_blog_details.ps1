$ErrorActionPreference = "Stop"
$file = "D:\laragon\www\HeroBiz-1.0.0\template_backup\blog-details.html"
$out  = "D:\laragon\www\HeroBiz-1.0.0\resources\views\blog\show.blade.php"
$lines = Get-Content $file

$start = ($lines | Select-String -Pattern '<main class="main">').LineNumber
$end   = ($lines | Select-String -Pattern '</main>').LineNumber
$contentLines = $lines[($start)..($end-2)]

# Convert asset paths
$contentLines = $contentLines -replace 'src="(assets/[^"]*)"', 'src="{{ asset(''$1'') }}"'
$contentLines = $contentLines -replace 'href="(assets/[^"]*)"', 'href="{{ asset(''$1'') }}"'

$header = '@extends(''layouts.app'')' + "`n`n" +
          '@section(''title'', ''Blog Details - HeroBiz Bootstrap Template'')' + "`n`n" +
          '@section(''body_class'', ''blog-page'')' + "`n`n" +
          '@section(''content'')' + "`n"

$footer = "`n`n" + '@endsection' + "`n"

$result = $header + ($contentLines -join "`n") + $footer
Set-Content -Path $out -Value $result -Encoding UTF8
Write-Host "Blog show Blade view created at $out"
Write-Host "Content lines: $($contentLines.Count)"