<?php
/*
 * 等学习到写 coursera 算法课开始写的时候，我就切换到 C 语言去。
 * @lc app=leetcode.cn id=58 lang=php
 *
 * [58] 最后一个单词的长度
 *
 * https://leetcode-cn.com/problems/length-of-last-word/description/
 *
 * algorithms
 * Easy (34.45%)
 * Likes:    311
 * Dislikes: 0
 * Total Accepted:    181.7K
 * Total Submissions: 526.4K
 * Testcase Example:  '"Hello World"'
 *
 * 给你一个字符串 s，由若干单词组成，单词之间用空格隔开。返回字符串中最后一个单词的长度。如果不存在最后一个单词，请返回 0 。
 *
 * 单词 是指仅由字母组成、不包含任何空格字符的最大子字符串。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：s = "Hello World"
 * 输出：5
 *
 *
 * 示例 2：
 *
 *
 * 输入：s = " "
 * 输出：0
 *
 *
 *
 *
 * 提示：
 *
 *
 * 1
 * s 仅有英文字母和空格 ' ' 组成
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return int
     */
    public function lengthOfLastWord($s)
    {
        // method 1
        // $a = explode(' ', trim($s));
        // return strlen(array_pop($a));

        // method 2
        $count = 0;

        for ($i = strlen($s) - 1; $i >= 0; $i --) {
            // 字符串为空，
            if ($s[$i] === " ") {
                // 有记数了，说明 count 记数完了，可以返回
                if ($count > 0) {
                    return $count;
                }
            } else {
                $count ++;
            }
        }

        // 默认返回 count
        return $count;
    }
}
// @lc code=end
