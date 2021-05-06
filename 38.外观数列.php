<?php
/*
 * @lc app=leetcode.cn id=38 lang=php
 *
 * [38] 外观数列
 *
 * https://leetcode-cn.com/problems/count-and-say/description/
 *
 * algorithms
 * Easy (57.45%)
 * Likes:    694
 * Dislikes: 0
 * Total Accepted:    187.3K
 * Total Submissions: 325.8K
 * Testcase Example:  '1'
 *
 * 给定一个正整数 n ，输出外观数列的第 n 项。
 *
 * 「外观数列」是一个整数序列，从数字 1 开始，序列中的每一项都是对前一项的描述。
 *
 * 你可以将其视作是由递归公式定义的数字字符串序列：
 *
 *
 * countAndSay(1) = "1"
 * countAndSay(n) 是对 countAndSay(n-1) 的描述，然后转换成另一个数字字符串。
 *
 *
 * 前五项如下：
 *
 *
 * 1.     1
 * 2.     11
 * 3.     21
 * 4.     1211
 * 5.     111221
 * 第一项是数字 1
 * 描述前一项，这个数是 1 即 “ 一 个 1 ”，记作 "11"
 * 描述前一项，这个数是 11 即 “ 二 个 1 ” ，记作 "21"
 * 描述前一项，这个数是 21 即 “ 一 个 2 + 一 个 1 ” ，记作 "1211"
 * 描述前一项，这个数是 1211 即 “ 一 个 1 + 一 个 2 + 二 个 1 ” ，记作 "111221"
 *
 *
 * 要 描述 一个数字字符串，首先要将字符串分割为 最小 数量的组，每个组都由连续的最多 相同字符
 * 组成。然后对于每个组，先描述字符的数量，然后描述字符，形成一个描述组。要将描述转换为数字字符串，先将每组中的字符数量用数字替换，再将所有描述组连接起来。
 *
 * 例如，数字字符串 "3322251" 的描述如下图：
 *
 *
 *
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：n = 1
 * 输出："1"
 * 解释：这是一个基本样例。
 *
 *
 * 示例 2：
 *
 *
 * 输入：n = 4
 * 输出："1211"
 * 解释：
 * countAndSay(1) = "1"
 * countAndSay(2) = 读 "1" = 一 个 1 = "11"
 * countAndSay(3) = 读 "11" = 二 个 1 = "21"
 * countAndSay(4) = 读 "21" = 一 个 2 + 一 个 1 = "12" + "11" = "1211"
 *
 *
 *
 *
 * 提示：
 *
 *
 * 1
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int $n
     * @return String
     */
    public function countAndSay($n)
    {
        if ($n === 1) {
            return (string)$n;
        }

        $descriptionLastOne = $this->countAndSay($n - 1);

        // 分融各个字符串
        $lastOne = (string)$descriptionLastOne;
        $a = []; // 记录分类，及其个数
        $j = $lastOne[0]; // 标记位

        $currentClassification = 0;

        $a[$currentClassification]['value'] = $lastOne[0];
        $a[$currentClassification]['count'] = 0;

        for ($i = 0; $i < strlen($lastOne); $i ++) {
            // 相同，往前跳一格
            if ($lastOne[$i] !== $j) {
                $j = $lastOne[$i];
                $currentClassification ++;
                $a[$currentClassification]['value'] = $lastOne[$i];
                // var_dump('last one ' . $lastOne . ' $i ' . $i);
                // var_dump('current classification '. $currentClassification . ' value ' . $lastOne . ' $i ' . $i);
            }
            $oldCount = $a[$currentClassification]['count'] ?? 0;

            $a[$currentClassification]['count'] = $oldCount + 1;;

            // var_dump($a);
        }

        $currentDescription = '';

        foreach ($a as $value) {
            $currentDescription .= (string)$value['count'] . (string)$value['value'];
        }

        // var_dump($currentDescription, $a, $descriptionLastOne);

        return (string)$currentDescription;
    }
}
// @lc code=end
