<?php


class Pass
{

	public static function generate($password)
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public static function validate($password, $correct_hash)
	{
		sleep(1);
		return password_verify($password, $correct_hash);
	}
}
