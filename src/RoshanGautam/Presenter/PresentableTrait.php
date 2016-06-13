<?php namespace RoshanGautam\Presenter;

use RoshanGautam\Presenter\Exceptions\PresenterException;

trait PresentableTrait {

	/**
	 * View presenter instance
	 *
	 * @var mixed
	 */
	protected $presenterInstance;

	/**
	 * Prepare a new or cached presenter instance
	 *
	 * @return mixed
	 * @throws PresenterException
	 */
	public function present()
	{
		if ( ! $this->presenterClass or ! class_exists($this->presenterClass))
		{
			throw new PresenterException('Please set the $presenter property to your presenter path.');
		}

		if ( ! $this->presenterInstance)
		{
			$this->presenterInstance = new $this->presenterClass($this);
		}

		return $this->presenterInstance;
	}

} 