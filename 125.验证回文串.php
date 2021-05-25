<?php
/*
 * @lc app=leetcode.cn id=125 lang=php
 *
 * [125] 验证回文串
 *
 * https://leetcode-cn.com/problems/valid-palindrome/description/
 *
 * algorithms
 * Easy (47.10%)
 * Likes:    383
 * Dislikes: 0
 * Total Accepted:    234.9K
 * Total Submissions: 497.6K
 * Testcase Example:  '"A man, a plan, a canal: Panama"'
 *
 * 给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。
 *
 * 说明：本题中，我们将空字符串定义为有效的回文串。
 *
 * 示例 1:
 *
 * 输入: "A man, a plan, a canal: Panama"
 * 输出: true
 *
 *
 * 示例 2:
 *
 * 输入: "race a car"
 * 输出: false
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
    public function isPalindrome($s)
    {
        // var_dump($s);
        // $s = preg_replace('/^[^a-zA-Z0-9]*.$', '', $s);
        // var_dump($s);

        // var_dump(preg_match('/^[a-zA-Z0-9]*$/', ':'));

        // "race a car" raceacar


        $strLength = strlen($s);
        // var_dump($strLength);

        for ($i = 0, $j = $strLength - 1; $i <= $j;) {
            // var_dump('before loop');
            if (! preg_match('/^[a-zA-Z0-9]*$/', $s[$i])) {
                $i++;
                // var_dump('here');
                continue;
            }

            if (! preg_match('/^[a-zA-Z0-9]*$/', $s[$j])) {
                $j--;
                // var_dump('there');
                continue;
            }

            if (strtolower($s[$i]) !== strtolower($s[$j])) {
                return false;
            }

            $i++;
            $j--;
            // var_dump($i);
        }

        // var_dump($i, $j);

        return true;
    }
}
// @lc code=end
