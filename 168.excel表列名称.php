<?php
/*
 * @lc app=leetcode.cn id=168 lang=php
 *
 * [168] Excel表列名称
 *
 * https://leetcode-cn.com/problems/excel-sheet-column-title/description/
 *
 * algorithms
 * Easy (39.14%)
 * Likes:    347
 * Dislikes: 0
 * Total Accepted:    51.2K
 * Total Submissions: 130.3K
 * Testcase Example:  '1'
 *
 * 给定一个正整数，返回它在 Excel 表中相对应的列名称。
 *
 * 例如，
 *
 * ⁠   1 -> A
 * ⁠   2 -> B
 * ⁠   3 -> C
 * ⁠   ...
 * ⁠   26 -> Z
 * ⁠   27 -> AA
 * ⁠   28 -> AB
 * ⁠   ...
 *
 *
 * 示例 1:
 *
 * 输入: 1
 * 输出: "A"
 *
 *
 * 示例 2:
 *
 * 输入: 28
 * 输出: "AB"
 *
 *
 * 示例 3:
 *
 * 输入: 701
 * 输出: "ZY"
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int $columnNumber
     * @return String
     */
    public function convertToTitle($columnNumber)
    {
        $str = '';

        // 2147483647
        // while ((int)($columnNumber / 26)) {
        //     if ($columnNumber / 26) {
        //         $str = chr($columnNumber % 26 + 64) . $str;
        //     } else {
        //         $columnNumber = (int)($columnNumber / 26);
        //     }
        // }

        // $str = chr($columnNumber + 64) . $str;

        $data = [];

        if ($columnNumber % 26 === 0) {
            // 专门处理余数为 0 的情况。 还是很难的！
            if ($columnNumber > 0) {
                return $this->convertToTitle(($columnNumber / 26) - 1) . 'Z';
            } else {
                return '';
            }
        } else {
            while ($columnNumber > 26) {
                $data[] = $columnNumber % 26;

                // var_dump($columnNumber .' ' . (int)floor($columnNumber / 26));
                $columnNumber = (int)floor($columnNumber / 26);
            }

            $data[] = $columnNumber;
        }


        // var_dump($data);

        $str = '';
        for ($i = count($data) - 1; $i >= 0; $i--) {
            $str .= chr($data[$i] + 64);
        }

        return $str;
    }
}
// @lc code=end
