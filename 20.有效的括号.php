<?php
/*
 * @lc app=leetcode.cn id=20 lang=php
 *
 * [20] 有效的括号
 *
 * https://leetcode-cn.com/problems/valid-parentheses/description/
 *
 * algorithms
 * Easy (44.00%)
 * Likes:    2374
 * Dislikes: 0
 * Total Accepted:    618.2K
 * Total Submissions: 1.4M
 * Testcase Example:  '"()"'
 *
 * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。
 *
 * 有效字符串需满足：
 *
 *
 * 左括号必须用相同类型的右括号闭合。
 * 左括号必须以正确的顺序闭合。
 *
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：s = "()"
 * 输出：true
 *
 *
 * 示例 2：
 *
 *
 * 输入：s = "()[]{}"
 * 输出：true
 *
 *
 * 示例 3：
 *
 *
 * 输入：s = "(]"
 * 输出：false
 *
 *
 * 示例 4：
 *
 *
 * 输入：s = "([)]"
 * 输出：false
 *
 *
 * 示例 5：
 *
 *
 * 输入：s = "{[]}"
 * 输出：true
 *
 *
 *
 * 提示：
 *
 *
 * 1
 * s 仅由括号 '()[]{}' 组成
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function isValid($s)
    {
        $lefts = [ '(', '{', '[' ];
        $rights = [ ')', '}', ']' ];

        $rightsMap = [
            ')' => '(',
            '}' => '{',
            ']' => '[',
        ];

        $a = [];

        // for ($i = 0; $i < strlen($s); $i ++) {
        //     $currentChar = substr($s, $i, 1);
        //     if (in_array($currentChar, $lefts)) {
        //         $a[] = $currentChar;
        //     }

        //     if (in_array($currentChar, $rights)) {
        //         // 找到与之配对的元素
        //         for ($j = 0; $j < count($a); $j ++) {
        //             if ($a[$j] === $rightsMap[$currentChar]) {
        //                 unset($a[$j]);
        //                 $a = array_values($a[$j]);
        //                 break;
        //             }

        //             if ($j === count($a) - 1) {
        //                 return false;
        //             }
        //         }
        //     }
        // }

        for ($i = 0; $i < strlen($s); $i ++) {
            $currentChar = substr($s, $i, 1);
            if (in_array($currentChar, $lefts)) {
                $a[] = $currentChar;
            }

            if (in_array($currentChar, $rights)) {
                // 找到与之配对的元素
                if ($i === 0) {
                    return false;
                }

                // 注意下标
                if ($a[count($a) - 1] === $rightsMap[$currentChar]) {
                    unset($a[count($a) - 1]);
                    // 重新整理 array
                    $a = array_values($a);
                } else {
                    return false;
                }
            }
        }

        return count($a) === 0;
    }
}
// @lc code=end
