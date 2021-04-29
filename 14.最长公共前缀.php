<?php
/*
 * @lc app=leetcode.cn id=14 lang=php
 *
 * [14] 最长公共前缀
 *
 * https://leetcode-cn.com/problems/longest-common-prefix/description/
 *
 * algorithms
 * Easy (39.43%)
 * Likes:    1582
 * Dislikes: 0
 * Total Accepted:    507.3K
 * Total Submissions: 1.3M
 * Testcase Example:  '["flower","flow","flight"]'
 *
 * 编写一个函数来查找字符串数组中的最长公共前缀。
 *
 * 如果不存在公共前缀，返回空字符串 ""。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：strs = ["flower","flow","flight"]
 * 输出："fl"
 *
 *
 * 示例 2：
 *
 *
 * 输入：strs = ["dog","racecar","car"]
 * 输出：""
 * 解释：输入不存在公共前缀。
 *
 *
 *
 * 提示：
 *
 *
 * 0
 * 0
 * strs[i] 仅由小写英文字母组成
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $strs
     * @return String
     */
    public function longestCommonPrefix($strs)
    {
        $count = count($strs);


        if ($count === 1) {
            return join($strs);
        }

        $minLength = -1;

        $commonStr = [];

        foreach ($strs as $str) {
            if ($minLength < 0) {
                $minLength = strlen($str);
                continue;
            }
            $minLength = strlen($str) < $minLength ? strlen($str) : $minLength;
        }


        for ($i = 0; $i < $minLength; $i ++) {
            for ($j = 0; $j < $count - 1; $j ++) {
                // 第 i 位字符
                if (substr($strs[$j], $i, 1) !== substr($strs[$j + 1], $i, 1)) {
                    return join($commonStr);
                }

                if ($j === $count - 2) {
                    $commonStr[] = substr($strs[$j], $i, 1);
                }
            }
        }

        return join($commonStr);
    }
}
// @lc code=end
