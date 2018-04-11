<?php
use yii\helpers\Html;
?>
<h3>题目内容</h3>
<p>
    题目需包含：标题、描述、输入描述、输出描述、样例输入、样例输出、样例解释或提示信息（可选）、测试数据。
</p>
<p>
    有需要的应该写个暴力，且拿暴力跟标程对拍。
</p>

<h3>题目的测试数据文件要求</h3>
<ol>
    <li>数据文件包含输入文件，输出文件。就算题目无输入要求，也应包含一个空的输入文件。</li>
    <li>输入输出的文件名称必须一一对应，只是后缀不同。输入文件的后缀为 `in`，输出文件的后缀为 `out`。举例：输入文件文件全名为 `1.in`，则对应输出文件的文件全名必须为 `1.out`</li>
    <li>题目的测试数据中必须包括各种各样的数据，而且应该有各种各样的达到最小数据范围的数据和达到最大数据范围的数据。也就是说如果1 ≤ n ≤ 100000，那么数据中既应该有 n = 1，也应该有 n = 100000。</li>
    <li> 一个文件对(即输入文件与对应的输出文件)称为一个测试点，测试点可以有多个。程序运行时间的计算结果为所有测试点中，单个测试点所需时间的最大值。</li>
    <li>不建议要求采用“输入 t, 表示 t 组数据”之类的题面，建议一个测试点一组样例，即类似于 CF 或者 World Final 那样题面即可。
        为保证能够完整测试程序，建议测试点在 20 左右，如无法满足测试，则应控制在 150 以内。
    </li>
    <li>
        测试数据不建议完全依赖于程序生成，最好人为考虑各种不同的情况，针对这些情况出数据。
    </li>
</ol>

<h3>题面规范</h3>
<ol>
    <li>题面必须清晰好懂，没有语法错误。</li>
    <li>题目背景中不要写数据范围，全部都要写在输入格式里。</li>
    <li>必须写明所提到的所有变量的范围。范围描述应当使用 ≤，而不是 ＜。如果提到一个字符串，必须写明哪些字符可以出现在这个字符串内。</li>
    <li>题目描述数组下标最好从 1 开始。</li>
    <li>如果是中文题面的题目，请正确使用标点符号，不要混用中英文标点(中文使用全角，英文使用半角)。</li>
    <li>OJ 支持 Markdown 语法与 Mathjax 语法。题目出现的所有变量名应使用 Mathjax 语法来包含，数据范围的描述也用 Mathjax 来写。</li>
    <li>如果是中文题面，出现的变量或者英文与中文之间要有一个空格。</li>
    <li>不建议在中文题面中用英文名或汉语拼音。</li>
</ol>

<h3>Special Judge</h3>
<p>简称 SPJ，这是针对用户输出的特判。比如，根据题面求解出来的答案可能存在多个，这样就无法定义一个准确的输出文件来判断用户是否正确，这时就需要 SPJ。或者允许用户的输出在某一精度范围内是正确的。</p>
<p>下面提供一种写法</p>
<pre>

</pre>

<h3>如何快速生成输入输出文件</h3>
<p>以下只是提供一种示范</p>
<pre>

</pre>

<hr>
<h2>出题请使用 <?= Html::a(Yii::t('app', 'Polygon System'), ['/polygon']) ?></h2>
<p>这是一个出题平台</p>
