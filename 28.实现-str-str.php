<?php
/*
 * @lc app=leetcode.cn id=28 lang=php
 *
 * [28] 实现 strStr()
 *
 * https://leetcode-cn.com/problems/implement-strstr/description/
 *
 * algorithms
 * Easy (40.62%)
 * Likes:    885
 * Dislikes: 0
 * Total Accepted:    380K
 * Total Submissions: 935.4K
 * Testcase Example:  '"hello"\n"ll"'
 *
 * 实现 strStr() 函数。
 *
 * 给你两个字符串 haystack 和 needle ，请你在 haystack 字符串中找出 needle 字符串出现的第一个位置（下标从 0
 * 开始）。如果不存在，则返回  -1 。
 *
 *
 *
 * 说明：
 *
 * 当 needle 是空字符串时，我们应当返回什么值呢？这是一个在面试中很好的问题。
 *
 * 对于本题而言，当 needle 是空字符串时我们应当返回 0 。这与 C 语言的 strstr() 以及 Java 的 indexOf()
 * 定义相符。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：haystack = "hello", needle = "ll"
 * 输出：2
 *
 *
 * 示例 2：
 *
 *
 * 输入：haystack = "aaaaa", needle = "bba"
 * 输出：-1
 *
 *
 * 示例 3：
 *
 *
 * 输入：haystack = "", needle = ""
 * 输出：0
 *
 *
 *
 *
 * 提示：
 *
 *
 * 0
 * haystack 和 needle 仅由小写英文字符组成
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    public function strStr($haystack, $needle)
    {
        if ($needle === "") {
            return 0;
        }

        $haystackCount = strlen($haystack);
        $needleCount = strlen($needle);

        for ($i = 0; $i < ($haystackCount - $needleCount + 1) ; $i ++) {
            if (substr($haystack, $i, $needleCount) === $needle) {
                return $i;
            }
        }

        return -1;
    }
}
// @lc code=end
